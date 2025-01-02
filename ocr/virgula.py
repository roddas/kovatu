import sys

def process_file(input_file, output_file):
    with open(input_file, mode='r', encoding='utf-8') as infile, open(output_file, mode='w', encoding='utf-8') as outfile:
        for line in infile:
            # Divide a linha em partes com base no delimitador ';'
            parts = line.split(';', 2)
            # Mantém o primeiro delimitador ';' e remove os demais
            if len(parts) > 2:
                new_line = f"{parts[0]};{parts[1]}{parts[2].replace(';', '')}"
            else:
                new_line = line.strip()
            outfile.write(new_line + '\n')

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Uso: python script.py <arquivo_entrada.txt> <arquivo_saida.txt>")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]

    process_file(input_file, output_file)
