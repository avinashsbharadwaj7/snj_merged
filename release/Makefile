TAR_FILE_DIR=snj
RELEASE_DIR=release
SNJ_TAR_FILE=snj.tar.gz 
TARGET_IMPORT_TAR_FILE=importscripts.tar.gz 
DB_GZIP_FILE=snj.sql.gz 
MANIFEST=manifest.files.snj

.PHONY: all clean snj targetimportscripts

all: snj targetimportscripts db

snj: $(TAR_FILE_DIR)/$(SNJ_TAR_FILE)

targetimportscripts: $(TAR_FILE_DIR)/$(TARGET_IMPORT_TAR_FILE)

db: $(TAR_FILE_DIR)/$(DB_GZIP_FILE)

$(TAR_FILE_DIR)/$(SNJ_TAR_FILE) : 
	mkdir -p $(TAR_FILE_DIR)
	cd ..; tar czfv $(RELEASE_DIR)/$@  `cat $(RELEASE_DIR)/$(MANIFEST)`
	@echo ""
	@echo "Release file $@ created."
	@echo ""

$(TAR_FILE_DIR)/$(TARGET_IMPORT_TAR_FILE) : 
	mkdir -p $(TAR_FILE_DIR)
	cd ..; tar czfv $(RELEASE_DIR)/$@ --exclude-vcs importscripts
	@echo ""
	@echo "Release file $@ created."
	@echo ""

$(TAR_FILE_DIR)/$(DB_GZIP_FILE) : ../dbschema/$(DB_GZIP_FILE)
	mkdir -p $(TAR_FILE_DIR)
	cp $? $@
	@echo "Release file $@ created."
	@echo ""

clean:
	rm -f $(TAR_FILE_DIR)/$(SNJ_TAR_FILE)
	rm -f $(TAR_FILE_DIR)/$(TARGET_IMPORT_TAR_FILE)
	rm -f $(TAR_FILE_DIR)/$(DB_GZIP_FILE)
	rmdir $(TAR_FILE_DIR)

