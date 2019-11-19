help:
	@echo "test"

test: phpunit phpcs

phpunit:
	vendor/bin/phpunit tests/ --coverage-clover=coverage.xml

phpcs:
	vendor/bin/phpcs --standard=PSR2 src/ tests/