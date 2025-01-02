import csv
import sys

def process_csv(input_file, output_file):
    with open(input_file, mode='r', encoding='utf-8') as infile, open(output_file, mode='w', encoding='utf-8', newline='') as outfile:
        reader = csv.reader(infile, delimiter=';')
        writer = csv.writer(outfile, delimiter=',')

        # Escreve o cabeçalho no arquivo de saída
        writer.writerow(["lingua", "proverbio", "interpretacao"])

        for row in reader:
            if len(row) == 2:  # Certifica-se de que há exatamente 2 colunas
                writer.writerow(["English", row[0], row[1]])
            else:
                print(f"Linha ignorada (não possui 2 colunas): {row}")

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Uso: python script.py <arquivo_entrada.csv> <arquivo_saida.csv>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]

    process_csv(input_file, output_file)
