help:
	@echo "test"

test: phpunit phpcs

phpunit:
	vendor/bin/phpunit tests/ --no-coverage

phpcs:
	vendor/bin/phpcs --standard=PSR2 src/ tests/