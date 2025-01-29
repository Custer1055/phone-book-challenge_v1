#!/bin/bash

# Define directories to exclude
exclude_dirs=(
  ".docker/postgres/data"
  "phone-book-api/.idea"
  "phone-book-api/.vscode"
  "phone-book-api/vendor"
  "webui/.angular"
  "webui/node_modules"
)

# Create an array to hold the --exclude parameters for zip command
exclude_params=()
for dir in "${exclude_dirs[@]}"; do
  exclude_params+=("--exclude=${dir}/*")
done

echo "What is your name? "
read candidate_name
candidate_name=$(echo $candidate_name | tr '[:upper:]' '[:lower:]' | tr ' ' '-')
echo "$candidate_name, thanks for participating on our tests!"
echo "We will now create a zip file with the delivery of your test."
timestamp=$(date +%s)

# Define the filename
filename="${candidate_name}_delivery_${timestamp}.zip"

# Create the zip file
zip -r $filename . "${exclude_params[@]}"

echo "Your delivery is ready! The file is named $filename"