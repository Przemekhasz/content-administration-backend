#!/bin/bash

git pull origin main

docker-compose up --build -d
docker-compose up -d
