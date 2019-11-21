help:
	@echo "test"

test: phpunit phpcs

phpunit:
	vendor/bin/phpunit -c phpunit.xml.dist

coverage:
	vendor/bin/phpunit --coverage-html build/coverage/

phpcs:
	vendor/bin/phpcs --standard=PSR2 src/ tests/