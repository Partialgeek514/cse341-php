-- Creation file for games database
------------------------------------------------------------

-- Clean-up
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS accounts;
DROP TABLE IF EXISTS reviews;

DROP TYPE IF EXISTS esrbRating;
DROP TYPE IF EXISTS fiveStarRating;
DROP TYPE IF EXISTS tripleLevel;

------------------------------------------------------------

-- Games Table: gameId, title, description, year, producer, genre, platforms, thumbnail, esrbRating, userRating
CREATE TYPE esrbRating AS ENUM ('E', 'E10+', 'T', 'M', 'A', 'NR');
CREATE TYPE fiveStarRating AS ENUM ('1', '2', '3', '4', '5');
CREATE TABLE games (
    gameId SERIAL PRIMARY KEY NOT NULL,
    gameTitle VARCHAR(64) NOT NULL,
    gameDescription VARCHAR(255),
    gameYear INT NOT NULL,
    gameProducer VARCHAR(64),
    gameGenre VARCHAR(16),
    gamePlatforms VARCHAR(255),
    gameThumbnail VARCHAR(255),
    gameEsrbRating esrbRating,
    gameUserRating fiveStarRating
);

--------------------------------------------------------------

-- Accounts Table: userId, userName, hashedPassword, birthday, profilePic, adminLevel
CREATE TYPE tripleLevel AS ENUM ('1', '2', '3');
CREATE TABLE accounts (
    userId SERIAL PRIMARY KEY NOT NULL,
    username VARCHAR(64) NOT NULL,
    hashedPassword VARCHAR(999) NOT NULL,
    birthday DATE NOT NULL,
    profilePic VARCHAR(255) NOT NULL,
    adminLevel tripleLevel NOT NULL
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