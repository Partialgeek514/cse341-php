-- Creation file for games database
------------------------------------------------------------

-- Clean-up
DROP TABLE games;

DROP TYPE esrbRating;
DROP TYPE fiveStarRating;

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
