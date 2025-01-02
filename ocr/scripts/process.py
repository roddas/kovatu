import sys

def process_file(input_file):
    """
    Reads an input file, keeps only the content between '$' delimiters,
    processes the phrases, removes '\n' within each phrase,
    and writes each processed phrase to 'output.txt' on a new line.
    """
    try:
        with open(input_file, "r", encoding="utf-8") as infile:
            content = infile.read()

        # Split the content by the '$' delimiter
        parts = content.split("$")
        
        # Initialize an empty list to store the processed phrases
        phrases = []

        # Loop through the parts and process those that are between $ delimiters (odd-index parts)
        for i in range(1, len(parts), 2):  # Start at index 1, and step by 2 (odd indices)
            phrase = parts[i].strip()

            # Remove any newline characters within the phrase
            phrase = phrase.replace("\n", " ").strip()

            # If the phrase is not empty, add it to the list of phrases
            if phrase:
                phrases.append(phrase)

        # Write each phrase on a new line in the output file
        with open("output.txt", "a", encoding="utf-8") as outfile:
            for phrase in phrases:
                outfile.write(phrase + "\n")
        
        print("Processed content saved to: output.txt")
    
    except FileNotFoundError:
        print(f"Error: File '{input_file}' not found.")
    except Exception as e:
        print(f"An error occurred: {e}")

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python script.py <input_file>")
        sys.exit(1)

    input_file = sys.argv[1]
    process_file(input_file)
