import sys
import csv
from langdetect import detect, DetectorFactory
from langdetect.lang_detect_exception import LangDetectException

# Set seed to ensure consistent language detection results
DetectorFactory.seed = 0

def reorganize_csv(lines):
    """
    Reorganizes a CSV where some phrases are split across multiple lines.
    - Removes rows where the content is in English ('en') or French ('fr').
    - Joins rows in Portuguese ('pt') that are broken across multiple lines.
    """
    reorganized_rows = []
    portuguese_buffer = []

    for line in lines:
        try:
            # Split line into CSV fields using the delimiter ';'
            fields = line.strip().split(";")
            # Combine fields to treat the line as a phrase
            full_text = " ".join(fields)

            # Detect the language of the combined text
            lang = detect(full_text)
            if lang == "pt":
                portuguese_buffer.append(full_text)  # Buffer Portuguese lines
            elif lang not in ["en", "fr"]:
                # If buffer has Portuguese lines, flush them as a single joined line
                if portuguese_buffer:
                    reorganized_rows.append([" ".join(portuguese_buffer)])
                    portuguese_buffer = []
                reorganized_rows.append(fields)  # Keep non-English/French rows
        except LangDetectException:
            # Keep the row if language detection fails
            if portuguese_buffer:
                reorganized_rows.append([" ".join(portuguese_buffer)])
                portuguese_buffer = []
            reorganized_rows.append(fields)

    # Flush any remaining Portuguese lines
    if portuguese_buffer:
        reorganized_rows.append([" ".join(portuguese_buffer)])

    return reorganized_rows

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python script.py <input_file>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = "output.csv"  # Output file path

    try:
        # Read the CSV file
        with open(input_file, "r", encoding="utf-8") as infile:
            csv_lines = infile.readlines()

        # Reorganize the CSV
        reorganized_rows = reorganize_csv(csv_lines)

        # Write the reorganized content to a new CSV file
        with open(output_file, "w", encoding="utf-8", newline="") as outfile:
            writer = csv.writer(outfile, delimiter=";")
            writer.writerows(reorganized_rows)

        print(f"Reorganized CSV saved to: {output_file}")
    except FileNotFoundError:
        print(f"Error: File '{input_file}' not found.")
    except Exception as e:
        print(f"An error occurred: {e}")
