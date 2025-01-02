import json
import csv
import sys

def json_to_csv(input_file, output_file):
    # Open the JSON file and load the data
    with open(input_file, mode='r', encoding='utf-8') as json_file:
        data = json.load(json_file)

    # Open the CSV file for writing
    with open(output_file, mode='w', encoding='utf-8', newline='') as csv_file:
        writer = csv.DictWriter(csv_file, fieldnames=["lingua","proverbio","interpretacao"], quotechar='"', quoting=csv.QUOTE_ALL)

        # Write the header
        writer.writeheader()

        # Write the rows to the CSV
        for item in data:
            writer.writerow(item)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python script.py <input_file.json> <output_file.csv>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]

    json_to_csv(input_file, output_file)
