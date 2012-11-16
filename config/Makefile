selfupdate:
	mkdir -p tmp
	git clone git://github.com/denvertimothy/ThrivePHP.git tmp/thrive
	rsync --checksum --files-from=./selfupdate-files --no-relative ./tmp/thrive/ ../
	rm -rf tmp