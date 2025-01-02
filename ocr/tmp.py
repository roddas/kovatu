import csv
import sys

def process_csv(input_file, output_file, ignored_file):
    with open(input_file, mode='r', encoding='utf-8') as infile, \
         open(output_file, mode='w', encoding='utf-8', newline='') as outfile, \
         open(ignored_file, mode='w', encoding='utf-8', newline='') as ignoredfile:

        writer = csv.writer(outfile, delimiter=',')
        ignored_writer = csv.writer(ignoredfile, delimiter=',')

        # Escreve o cabeçalho no arquivo de saída
        writer.writerow(["lingua", "proverbio", "interpretacao"])

        for line in infile:
            # Divide a linha em provérbio (maiúsculas) e interpretação (minúsculas)
            parts = line.strip().split(",", 1)
            if len(parts) == 2:
                proverb = parts[0].strip()  # Provérbio em maiúsculas
                interpretation = parts[1].strip()  # Interpretação em minúsculas
                # Verifica se o provérbio está em maiúsculas
                if proverb.isupper():
                    writer.writerow(["English", proverb, interpretation])
                else:
                    ignored_writer.writerow([line.strip()])
            else:
                ignored_writer.writerow([line.strip()])

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Uso: python script.py <arquivo_entrada.txt> <arquivo_saida.csv> <ignored.txt>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]
    ignored_file = sys.argv[3]

    process_csv(input_file, output_file, ignored_file)
