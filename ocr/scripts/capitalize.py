import csv
import sys

def capitalize_proverbio(input_file, output_file):
    with open(input_file, mode='r', encoding='utf-8') as infile, \
         open(output_file, mode='w', encoding='utf-8', newline='') as outfile:

        reader = csv.reader(infile, delimiter=',', quotechar='"')
        writer = csv.writer(outfile, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)

        # Read and write the header (assuming the first row is a header)
        header = next(reader)
        writer.writerow(header)

        # Process each row
        for row in reader:
            if len(row) >= 3:  # Ensure there are at least 3 columns: lingua, proverbio, and interpretacao
                # Capitalize the 'proverbio' (second column)
                row[1] = row[1].strip().capitalize()  # Capitalizing and removing extra spaces
            writer.writerow(row)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python script.py <input_file.csv> <output_file.csv>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]

    capitalize_proverbio(input_file, output_file)
