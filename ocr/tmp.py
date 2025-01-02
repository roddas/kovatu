import csv
import sys

def process_csv(input_file, output_file, error_file):
    with open(input_file, mode='r', encoding='utf-8') as infile, \
         open(output_file, mode='w', encoding='utf-8', newline='') as outfile, \
         open(error_file, mode='w', encoding='utf-8', newline='') as errorfile:

        reader = csv.reader(infile, delimiter=';')
        writer = csv.writer(outfile, delimiter=';')
        error_writer = csv.writer(errorfile, delimiter=';')

        for row in reader:
            if len(row) == 3:  # Linhas com 3 colunas
                new_row = [row[0], f"{row[1]} {row[2]}"]
                writer.writerow(new_row)
            elif len(row) == 2:  # Linhas com 2 colunas
                new_row = [row[0], row[1]]
                writer.writerow(new_row)
            else:  # Linhas com menos de 2 colunas
                error_writer.writerow(row)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Uso: python script.py <arquivo_entrada.csv> <arquivo_saida.csv>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]
    error_file = "2_lines.txt"  # Arquivo para salvar as linhas com menos de 2 colunas

    process_csv(input_file, output_file, error_file)
