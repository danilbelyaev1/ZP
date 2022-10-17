all: install

build: install

install:
	[ -L upload ]         || /usr/bin/env ln -s /home/deploy/_shared/rpn/healthy-nutrition/upload       upload
	[ -L bitrix ]         || /usr/bin/env ln -s /home/deploy/_shared/rpn/healthy-nutrition/bitrix       bitrix
	[ -L include ]        || /usr/bin/env ln -s /home/deploy/_shared/rpn/healthy-nutrition/include      include

	composer install --no-progress
	npm install --no-progress
	npm run build
