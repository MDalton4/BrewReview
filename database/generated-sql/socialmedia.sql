
-----------------------------------------------------------------------
-- user
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [user];

CREATE TABLE [user]
(
    [username] VARCHAR(24) NOT NULL,
    [password] VARCHAR(255) NOT NULL,
    [real_name] VARCHAR(100) NOT NULL,
    [permissions] TINYINT NOT NULL,
    [picture] BLOB,
    [creationTime] TIMESTAMP NOT NULL,
    [lastActivityTime] TIMESTAMP NOT NULL,
    PRIMARY KEY ([username]),
    UNIQUE ([username])
);

-----------------------------------------------------------------------
-- company
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [company];

CREATE TABLE [company]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [name] VARCHAR(100) NOT NULL,
    [picture] BLOB,
    [location] VARCHAR(200),
    [description] MEDIUMTEXT,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- style
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [style];

CREATE TABLE [style]
(
    [style] VARCHAR(100) NOT NULL,
    [description] MEDIUMTEXT NOT NULL,
    PRIMARY KEY ([style]),
    UNIQUE ([style])
);

-----------------------------------------------------------------------
-- drink
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [drink];

CREATE TABLE [drink]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [name] VARCHAR(100) NOT NULL,
    [picture] BLOB,
    [company_id] INTEGER NOT NULL,
    [style_name] VARCHAR(255) NOT NULL,
    UNIQUE ([id]),
    FOREIGN KEY ([company_id]) REFERENCES [company] ([id])
        ON DELETE CASCADE,
    FOREIGN KEY ([style_name]) REFERENCES [style] ([style])
        ON DELETE CASCADE
);

-----------------------------------------------------------------------
-- post
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [post];

CREATE TABLE [post]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [username] VARCHAR(24) NOT NULL,
    [body] MEDIUMTEXT NOT NULL,
    [creationTime] TIMESTAMP NOT NULL,
    UNIQUE ([id]),
    FOREIGN KEY ([username]) REFERENCES [user] ([username])
        ON DELETE CASCADE
);

-----------------------------------------------------------------------
-- review
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [review];

CREATE TABLE [review]
(
    [rating] DECIMAL NOT NULL,
    [drink_id] INTEGER NOT NULL,
    [post_id] INTEGER NOT NULL,
    PRIMARY KEY ([post_id]),
    UNIQUE ([post_id]),
    FOREIGN KEY ([post_id]) REFERENCES [post] ([id])
        ON DELETE CASCADE,
    FOREIGN KEY ([drink_id]) REFERENCES [drink] ([id])
        ON DELETE CASCADE
);

-----------------------------------------------------------------------
-- friend
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [friend];

CREATE TABLE [friend]
(
    [username] VARCHAR(24) NOT NULL,
    [friend_username] VARCHAR(24) NOT NULL,
    UNIQUE ([username],[friend_username]),
    FOREIGN KEY ([username]) REFERENCES [user] ([username])
        ON DELETE CASCADE,
    FOREIGN KEY ([friend_username]) REFERENCES [user] ([username])
        ON DELETE CASCADE
);

-----------------------------------------------------------------------
-- wishlist
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [wishlist];

CREATE TABLE [wishlist]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [username] VARCHAR(24) NOT NULL,
    [drink_id] INTEGER NOT NULL,
    UNIQUE ([username],[drink_id]),
    UNIQUE ([id]),
    FOREIGN KEY ([username]) REFERENCES [user] ([username])
        ON DELETE CASCADE,
    FOREIGN KEY ([drink_id]) REFERENCES [drink] ([id])
        ON DELETE CASCADE
);
