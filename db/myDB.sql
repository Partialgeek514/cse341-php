-- Creation file for games database
------------------------------------------------------------

-- Clean-up
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS accounts;
DROP TABLE IF EXISTS logoImages;
DROP TABLE IF EXISTS gameImages;
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS platformImages;
DROP TABLE IF EXISTS platforms;
DROP TABLE IF EXISTS platformTypes;
DROP TABLE IF EXISTS genres;
DROP TABLE IF EXISTS producers;

DROP TYPE IF EXISTS boolTruth;
DROP TYPE IF EXISTS esrbRating;
DROP TYPE IF EXISTS fiveStarRating;
DROP TYPE IF EXISTS tripleLevel;

------------------------------------------------------------
-- Producers Table: id, name, year, city, stateProvince, country
CREATE TABLE producers (
    producerId SERIAL PRIMARY KEY NOT NULL,
    producerName VARCHAR(64) NOT NULL,
    producerYear INTEGER NOT NULL,
    producerCity VARCHAR(32) NOT NULL,
    producerProvince VARCHAR(32),
    producerCountry VARCHAR(32) NOT NULL
);
------------------------------------------------------------
-- Genres Table: id, name
CREATE TABLE genres (
    genreId SERIAL PRIMARY KEY NOT NULL,
    genreName VARCHAR(32) NOT NULL
);
------------------------------------------------------------
-- Platform Types Table: id, name
CREATE TABLE platformTypes (
    typeId SERIAL PRIMARY KEY NOT NULL,
    typeName VARCHAR(32) NOT NULL
);
------------------------------------------------------------
-- Platforms Table: id, name, type, producer, year
CREATE TABLE platforms (
    platformId SERIAL PRIMARY KEY NOT NULL,
    platformName VARCHAR(32) NOT NULL,
    typeId INTEGER,
    producerId INTEGER,
    platformYear INTEGER,
    CONSTRAINT fk_type
        FOREIGN KEY (typeId)
            REFERENCES platformTypes(typeId),
    CONSTRAINT fk_producer
        FOREIGN KEY (producerId)
            REFERENCES producers(producerId)
);
------------------------------------------------------------
-- Platform Images Table: id, path, platformId, primaryImg
CREATE TYPE boolTruth AS ENUM ('0', '1');
CREATE TABLE platformImages (
    platImgId SERIAL PRIMARY KEY NOT NULL,
    imgPath VARCHAR(255) NOT NULL,
    platformId INTEGER NOT NULL,
    primaryImg boolTruth NOT NULL,
    CONSTRAINT fk_platform
        FOREIGN KEY (platformId)
            REFERENCES platforms(platformId)
);
------------------------------------------------------------
-- Games Table: gameId, title, description, year, producer, genre, platforms, thumbnail, esrbRating, userRating
CREATE TYPE esrbRating AS ENUM ('E', 'E10+', 'T', 'M', 'A', 'NR');
CREATE TYPE fiveStarRating AS ENUM ('1', '2', '3', '4', '5');
CREATE TABLE games (
    gameId SERIAL PRIMARY KEY NOT NULL,
    gameTitle VARCHAR(64) NOT NULL,
    gameDescription VARCHAR(999),
    gameYear INT NOT NULL,
    producerId INTEGER,
    genreId INTEGER,
    platformId INTEGER,
    gameEsrbRating esrbRating NOT NULL,
    gameUserRating fiveStarRating,
    CONSTRAINT fk_producer
        FOREIGN KEY (producerId)
            REFERENCES producers(producerId),
    CONSTRAINT fk_genre
        FOREIGN KEY (genreId)
            REFERENCES genres(genreId),
    CONSTRAINT fk_platform
        FOREIGN KEY (platformId)
            REFERENCES platforms(platformId)
);

--------------------------------------------------------------
CREATE TABLE gameImages (
    gameImgId SERIAL PRIMARY KEY NOT NULL,
    imgPath VARCHAR(255) NOT NULL,
    gameId INTEGER NOT NULL,
    primaryImg boolTruth NOT NULL,
    CONSTRAINT fk_game
        FOREIGN KEY (gameId)
            REFERENCES games(gameId)
);
--------------------------------------------------------------
CREATE TABLE logoImages (
    logoImgId SERIAL PRIMARY KEY NOT NULL,
    imgPath VARCHAR(255) NOT NULL,
    platformId INTEGER,
    gameId INTEGER,
    producerId INTEGER,
    primaryImg boolTruth NOT NULL,
    CONSTRAINT fk_platform
        FOREIGN KEY (platformId)
            REFERENCES platforms(platformId),
    CONSTRAINT fk_producer
        FOREIGN KEY (producerId)
            REFERENCES producers(producerId),
    CONSTRAINT fk_game
        FOREIGN KEY (gameId)
            REFERENCES games(gameId)
);
--------------------------------------------------------------

-- Accounts Table: userId, userName, hashedPassword, birthday, profilePic, adminLevel
CREATE TYPE tripleLevel AS ENUM ('1', '2', '3');
CREATE TABLE accounts (
    userId SERIAL PRIMARY KEY NOT NULL,
    username VARCHAR(64) NOT NULL,
    hashedPassword VARCHAR(999) NOT NULL,
    birthday DATE NOT NULL,
    favoriteGameId INTEGER,
    adminLevel tripleLevel NOT NULL,
    CONSTRAINT fk_game
        FOREIGN KEY (favoriteGameId)
            REFERENCES games(gameId)
);

---------------------------------------------------------------

-- Reviews Table: reviewId, reviewContent, gameId, userId, reviewDate
CREATE TABLE reviews (
    reviewId SERIAL PRIMARY KEY NOT NULL,
    reviewContent VARCHAR(255) NOT NULL,
    gameId INTEGER NOT NULL,
    userId INTEGER NOT NULL,
    reviewDate DATE NOT NULL,
    CONSTRAINT fk_game
        FOREIGN KEY (gameId)
            REFERENCES games(gameId),
    CONSTRAINT fk_account
        FOREIGN KEY (userId)
            REFERENCES accounts(userId)
);