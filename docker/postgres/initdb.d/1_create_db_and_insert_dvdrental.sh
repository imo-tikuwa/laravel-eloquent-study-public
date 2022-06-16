#!/bin/bash
set -e

# postgresユーザーで一般ユーザー作成、他
# 参考：https://hub.docker.com/_/postgres のInitialization scripts項
psql -v ON_ERROR_STOP=1 -U "$POSTGRES_USER" -d "$POSTGRES_DB" <<-EOSQL
	CREATE USER ${DB_USERNAME} WITH PASSWORD '${DB_PASSWORD}';
	CREATE DATABASE ${DB_DATABASE};
	CREATE DATABASE ${DB_DATABASE}_org;
	GRANT ALL PRIVILEGES ON DATABASE ${DB_DATABASE} TO ${DB_USERNAME};
	GRANT ALL PRIVILEGES ON DATABASE ${DB_DATABASE}_org TO ${DB_USERNAME};
EOSQL

# dvdrental.tarを一般ユーザーでリストア
# 参考：https://one-it-thing.com/3111/
pg_restore -v -U "$DB_USERNAME" --no-owner --role=${DB_USERNAME} -d "$DB_DATABASE" /docker-entrypoint-initdb.d/dvdrental.tar
pg_restore -v -U "$DB_USERNAME" --no-owner --role=${DB_USERNAME} -d ${DB_DATABASE}_org /docker-entrypoint-initdb.d/dvdrental.tar

# laravel用のデータベースからビューを全削除
psql -v ON_ERROR_STOP=1 -U "$DB_USERNAME" -d "$DB_DATABASE" -c "DROP VIEW $(psql -U ${DB_USERNAME} -d ${DB_DATABASE} -P tuples_only=1 -c '\dv' | cut -d '|' -f 2 |sed '/^$/d' | paste -sd "," | sed 's/ //g')"

# laravel用のデータベースからLaravel上で扱うのが難しそうな型について変更、削除
psql -v ON_ERROR_STOP=1 -U "$POSTGRES_USER" -d "$DB_DATABASE" <<-EOSQL
	ALTER TABLE film ALTER COLUMN rating TYPE character varying(5);
	ALTER TABLE film ALTER COLUMN rating SET DEFAULT 'G';
	ALTER TABLE film DROP COLUMN special_features;
	ALTER TABLE film DROP COLUMN fulltext;
EOSQL