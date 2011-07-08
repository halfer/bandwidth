
-----------------------------------------------------------------------------
-- download_file
-----------------------------------------------------------------------------

DROP TABLE "download_file" CASCADE;


CREATE TABLE "download_file"
(
	"id" serial  NOT NULL,
	"name" VARCHAR(255)  NOT NULL,
	"folder" VARCHAR(100) default '' NOT NULL,
	"path" VARCHAR(255)  NOT NULL,
	"original_uri" VARCHAR(512),
	"created_at" TIMESTAMP  NOT NULL,
	"checked_at" TIMESTAMP,
	"size" INTEGER,
	"is_enabled" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "download_file" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- download_group
-----------------------------------------------------------------------------

DROP TABLE "download_group" CASCADE;


CREATE TABLE "download_group"
(
	"id" serial  NOT NULL,
	"name" VARCHAR(64),
	"rate_limit" INTEGER,
	"count_limit" INTEGER,
	"bandwidth_limit" INTEGER,
	"concurrent_limit" INTEGER,
	"concurrent_limit_per_ip" INTEGER,
	"valid_from" DATE,
	"valid_to" DATE,
	"is_use_landing" BOOLEAN,
	"is_use_captcha" BOOLEAN,
	"system_group_type" INTEGER,
	"reset_frequency" INTEGER,
	"reset_offset" INTEGER,
	"is_enabled" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "download_group" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- file_group
-----------------------------------------------------------------------------

DROP TABLE "file_group" CASCADE;


CREATE TABLE "file_group"
(
	"download_file_id" INTEGER  NOT NULL,
	"download_group_id" INTEGER  NOT NULL,
	PRIMARY KEY ("download_file_id","download_group_id")
);

COMMENT ON TABLE "file_group" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- download_log
-----------------------------------------------------------------------------

DROP TABLE "download_log" CASCADE;


CREATE TABLE "download_log"
(
	"id" serial  NOT NULL,
	"download_file_id" INTEGER  NOT NULL,
	"started_at" TIMESTAMP  NOT NULL,
	"last_accessed_at" TIMESTAMP,
	"ip" VARCHAR(17)  NOT NULL,
	"byte_count" INTEGER  NOT NULL,
	"is_aborted" BOOLEAN,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "download_log" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- upload_queue
-----------------------------------------------------------------------------

DROP TABLE "upload_queue" CASCADE;


CREATE TABLE "upload_queue"
(
	"id" serial  NOT NULL,
	"owner_id" INTEGER  NOT NULL,
	"file_id" INTEGER,
	"url" VARCHAR(512)  NOT NULL,
	"path" VARCHAR(255)  NOT NULL,
	"created_at" DATE  NOT NULL,
	"processed_at" DATE,
	"status" INTEGER,
	"report" VARCHAR(512),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "upload_queue" IS '';


SET search_path TO public;
ALTER TABLE "file_group" ADD CONSTRAINT "file_group_FK_1" FOREIGN KEY ("download_file_id") REFERENCES "download_file" ("id");

ALTER TABLE "file_group" ADD CONSTRAINT "file_group_FK_2" FOREIGN KEY ("download_group_id") REFERENCES "download_group" ("id");

ALTER TABLE "download_log" ADD CONSTRAINT "download_log_FK_1" FOREIGN KEY ("download_file_id") REFERENCES "download_file" ("id");

ALTER TABLE "upload_queue" ADD CONSTRAINT "upload_queue_FK_1" FOREIGN KEY ("owner_id") REFERENCES "sf_guard_user" ("id");

ALTER TABLE "upload_queue" ADD CONSTRAINT "upload_queue_FK_2" FOREIGN KEY ("file_id") REFERENCES "download_file" ("id");
