help:
	@echo "test"

test: phpunit phpcs

phpunit:
	vendor/bin/phpunit -c phpunit.xml.dist

phpcs:
	vendor/bin/phpcs --standard=PSR2 src/ tests/