#!/bin/bash
##adds user candidate 

sudo useradd -m -s /bin/bash candidate
echo "candidate:candidate123" | sudo chpasswd

##install utils xz 7z bzip2  for challenge2
sudo apt install p7zip xz-utils bzip2 gzip zip


# Create a large number of files with tricky names and add garbage text
mkdir -p /challenge/needle
for i in $(seq 0 9); do
    for j in $(seq 1 100); do
        touch "/challenge/needle/$i$j.txt"
        echo "This is garbage text for file $i$j.txt" > "/challenge/needle/$i$j.txt"
    done
done

# create flag1
echo "flag1{u_made_it}" > /challenge/needle/flag1.txt

# Create a large number of subdirectories
mkdir -p /challenge/haystack
for i in $(seq 1 100); do
    mkdir -p "/challenge/haystack/dir$i"
done

touch /challenge/flag1.txt

# Move flag1.txt to a deep subdirectory
mkdir -p /challenge/haystack/dir1/dir2/dir3/dir4/dir5/dir6/dir7/dir8/dir9/dir10
mv /challenge/needle/flag1.txt /challenge/haystack/dir1/dir2/dir3/dir4/dir5/dir6/dir7/dir8/dir9/dir10

# Create a large ASCII text file using yes and head
#yes "This is a large ASCII text file. It contains a lot of text to compress. It can be easily compressed to free up space." | head -n 10000000 > /challenge/bigfile.txt

# Move the large uncompressed file to a random subdirectory
#mv /challenge/bigfile.txt /challenge/haystack/dir$(shuf -i 1-100 -n 1)/large_file.txt



# Compress the large file to free up space
#gzip /challenge/haystack/dir$(shuf -i 1-100 -n 1)/large_file.txt

# Print challenge instructions
#echo "Welcome to the Linux challenges!"
#echo "Challenge 1: Find the file named 'flag1.txt' hidden within a lot of subdirectories and files."
#echo "Solution: Run 'find /challenge -name flag1.txt' to find the file."
#echo "Challenge 2: Compress the large ASCII text file to free up space."
#echo "Solution: The large file has been compressed to 'large_file.txt.gz'."

#!/bin/bash


##CHALLENGE 3



# Create conc folder if it doesn't exist
mkdir -p /challenge/conc

# Create seventeen files with sequential numbers
for ((i=1; i<=17; i++)); do
    echo "CON\\CA\\TE \\NA\\TE $i" > /challenge/conc/file$i.txt
done

echo "Files created successfully."



##CHALLENGE 4 


#!/bin/bash

# Create the directory if it doesn't exist
mkdir -p /challenge/howmany/

# Create 1111 files within the directory
for ((i=1; i<=1111; i++)); do
    touch "/challenge/howmany/file$i.txt"
done

echo "Directory and files created successfully."

