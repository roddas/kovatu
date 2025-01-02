import pytesseract
from pdf2image import convert_from_path
import csv
import sys
import os

def extract_text_from_images(images):
    extracted_data = []
    for page_number, image in enumerate(images, start=1):
        print(f"Processing page {page_number}...")
        text = pytesseract.image_to_string(image, lang='por')  # Use Portuguese language
        lines = text.strip().split("\n")
        for line in lines:
            if line.strip():  # Skip empty lines
                extracted_data.append({"description": line.strip(), "language": "Portuguese"})
    return extracted_data

def process_pdf_to_csv(pdf_path, csv_output_path, batch_size=10):
    try:
        print("Starting PDF to CSV conversion...")
        pdf_pages = convert_from_path(pdf_path)
        total_pages = len(pdf_pages)

        file_exists = os.path.isfile(csv_output_path)
        
        with open(csv_output_path, mode='a' if file_exists else 'w', newline='', encoding='utf-8') as csv_file:
            writer = csv.DictWriter(csv_file, fieldnames=["description", "language"])
            
            # Write header only if the file is new
            if not file_exists:
                writer.writeheader()

            for i in range(0, total_pages, batch_size):
                print(f"Processing pages {i + 1} to {min(i + batch_size, total_pages)}...")
                images_batch = pdf_pages[i:i + batch_size]
                extracted_data = extract_text_from_images(images_batch)
                writer.writerows(extracted_data)

        print(f"Data successfully appended to {csv_output_path}" if file_exists else f"Data successfully saved to {csv_output_path}")
    except Exception as e:
        print(f"An error occurred: {e}")

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python script.py <input_pdf_path>")
        sys.exit(1)

    pdf_path = sys.argv[1]
    if not os.path.isfile(pdf_path):
        print(f"Error: File '{pdf_path}' not found.")
        sys.exit(1)

    csv_output_path = os.path.splitext(pdf_path)[0] + ".csv"
    process_pdf_to_csv(pdf_path, csv_output_path, batch_size=10)
