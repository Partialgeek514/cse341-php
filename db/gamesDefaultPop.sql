-- Games Database Default Values

INSERT INTO genres (genreName) VALUES ('Platformer');
INSERT INTO genres (genreName) VALUES ('Puzzle');
INSERT INTO genres (genreName) VALUES ('Adventure');
INSERT INTO genres (genreName) VALUES ('Sports');
INSERT INTO genres (genreName) VALUES ('Action');

INSERT INTO games (gameTitle, gameDescription, gameYear, genreId, gameEsrbRating) 
VALUES ('The Legend of Zelda: Breath of the Wild',
        'Forget everything you know about The Legend of Zelda games. Step into a
         world of discovery, exploration, and adventure in The Legend of Zelda:
         Breath of the Wild, a boundary-breaking new game in the acclaimed series. 
         Travel across vast fields, through forests, and to mountain peaks as you 
         discover what has become of the kingdom of Hyrule in this stunning 
         Open-Air Adventure. Now on Nintendo Switch, your journey is freer and 
         more open than ever. Take your system anywhere, and adventure as Link any 
         way you like.', 2017, 
        (SELECT genreId FROM genres WHERE genreName = 'Adventure'),'E10+');
INSERT INTO games (gameTitle, gameYear, gameEsrbRating) VALUES ('MarioKart 8 Deluxe', 2017, 'E');

INSERT INTO gameImages (imgPath, gameId, primaryImg) 
VALUES ('/GoodGames/images/gameImages/breath-of-the-wild-box-art.jpg', 
        (SELECT gameId FROM games WHERE gameTitle = 'The Legend of Zelda: Breath of the Wild'),
        '1');
INSERT INTO gameImages (imgPath, gameId, primaryImg) 
VALUES ('/GoodGames/images/gameImages/mariokart_8_deluxe_cover_art.png', 
        (SELECT gameId FROM games WHERE gameTitle = 'MarioKart 8 Deluxe'),
        '1');