VERSION=`cat ext_emconf.php|awk '/version.*=>.*([:digit:]+\.[:digit:]+\.[:digit:]+)?,/ { print $3 }'|sed -E  's/.*([0-9]+\.[0-9]+\.[0-9]+).*/\1/'|tr -d "\n"`

.PHONEY: do

all:
	@echo "Packaging version '$(VERSION)'"
	rm ../bw_backendsite_$(VERSION).zip; zip -r ../bw_backendsite_$(VERSION).zip * -x 'doc/*' '*/doc/*' '*/.*/*' '*/.*' 'nbproject/*' build.xml Makefile '*~' '*/*~' '*.scss'

doc:
	@echo "Rendering documentation for version '$(VERSION)'"
	#source < (docker run --rm t3docs/render-documentation show-shell-commands)
	#dockrun_t3rd makehtml
