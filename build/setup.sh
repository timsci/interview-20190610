#!/bin/bash

su application -c "php /app/artisan migrate --force"
