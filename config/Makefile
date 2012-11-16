selfupdate:
	@echo "===> Starting self update..."
	rm -rf /tmp/thrive
	mkdir -p /tmp/thrive
	@echo "===> Downloading system..."
	git clone git://github.com/denvertimothy/ThrivePHP.git /tmp/thrive
	@echo "===> Syncing system files..."
	rsync --progress --recursive --delete-after --checksum --files-from=./selfupdate-files --no-relative /tmp/thrive/ ../
	rm -rf /tmp/thrive
	@echo "===> Self update complete"