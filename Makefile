VERSION=`cat bw_backendsite/ext_emconf.php|awk '/version.*=>.*([:digit:]+\.[:digit:]+\.[:digit:]+)?,/ { print $3 }'|sed -E  's/.*([0-9]+\.[0-9]+\.[0-9]+).*/\1/'|tr -d "\n"`

.PHONEY: do

all:
	@echo "Packaging version '$(VERSION)'"
	rm ../bw_backendsite.zip; zip -r ../bw_backendsite.zip * -x 'doc/*' '*/doc/*' '*/.*/*' '*/.*' '*~' '*/*~' '*.scss'
