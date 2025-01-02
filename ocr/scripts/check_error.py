import csv
import sys

def validate_csv_format(input_file, error_file):
    with open(input_file, mode='r', encoding='utf-8') as infile, \
         open(error_file, mode='w', encoding='utf-8', newline='') as errorfile:

        reader = csv.reader(infile, delimiter=',', quotechar='"')
        error_writer = csv.writer(errorfile, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)

        # Write header to error file
        error_writer.writerow(['row', 'error_message'])

        row_number = 0
        for row in reader:
            row_number += 1

            # Skip header row if it exists
            if row_number == 1:
                continue

            # Check if row has the correct number of columns (assuming 3 columns)
            if len(row) != 3:
                error_writer.writerow([row_number, 'Invalid number of columns'])
                continue

            # Validate each column for empty values
            for index, value in enumerate(row):
                if not value.strip():
                    error_writer.writerow([row_number, f'Column {index + 1} cannot be empty'])

            # Optionally, check for incorrect formats like non-numeric values where expected
            # (For example, if column 3 is expected to be numeric, we could add a check here)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python script.py <input_file.csv> <error_file.csv>")
        sys.exit(1)

    input_file = sys.argv[1]
    error_file = sys.argv[2]

    validate_csv_format(input_file, error_file)
