help:
	@echo "test"

test: phpunit phpcs

phpunit:
	XDEBUG_MODE=coverage vendor/bin/phpunit -c phpunit.xml.dist

coverage:
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html build/coverage/

phpcs:
	vendor/bin/phpcs --standard=PSR2 src/ tests/
