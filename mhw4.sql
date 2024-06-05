CREATE database mhw4;
USE mhw4;

CREATE TABLE MANGA(
	nome varchar(40),
    demografia varchar(20),
    img_URL varchar (400),
    primary key (nome)
);

	INSERT INTO MANGA (nome, img_URL)
	values ("Yotsuba&!", "https://cdn.myanimelist.net/images/manga/5/259524.webp");
	INSERT INTO MANGA (nome, demografia, img_URL) 
	values ("Berserk", "Seinen", "https://cdn.myanimelist.net/images/manga/1/157897.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Frieren: Beyond Journey's End", "Shounen", "https://cdn.myanimelist.net/images/manga/3/232121.webp");
	INSERT INTO MANGA (nome, img_URL)
	values ("Azumanga Daioh: The Animation", "https://cdn.myanimelist.net/images/manga/2/259651.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Nichijou - My Ordinary Life", "Shounen", "https://cdn.myanimelist.net/images/manga/2/164728.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Ping Pong", "Seinen", "https://cdn.myanimelist.net/images/manga/2/151416.webp");
	INSERT INTO MANGA (nome, img_URL)
	values ("Girls' Last Tour", "https://cdn.myanimelist.net/images/manga/1/185918.webp");
	INSERT INTO MANGA (nome, img_URL)
	values ("Bocchi the Rock!", "https://cdn.myanimelist.net/images/manga/2/224954.webp");
	INSERT INTO MANGA (nome, img_URL)
	values ("Mob Psycho 100", "https://cdn.myanimelist.net/images/manga/2/204842.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Dragon Ball", "Shounen", "https://cdn.myanimelist.net/images/manga/1/267793.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Demon Slayer: Kimetsu no Yaiba", "Shounen", "https://cdn.myanimelist.net/images/manga/3/179023.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Dr. Stone", "Shounen", "https://cdn.myanimelist.net/images/manga/1/197883.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Vinland Saga", "Seinen", "https://cdn.myanimelist.net/images/manga/2/188925.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("One Piece", "Shounen", "https://cdn.myanimelist.net/images/manga/2/253146.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Fist of the North Star", "Shounen", "https://cdn.myanimelist.net/images/manga/3/258755.webp");
	INSERT INTO MANGA (nome, img_URL)
	values ("Shimeji Simulation", "https://cdn.myanimelist.net/images/manga/2/227584.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Goodnight Punpun", "Seinen", "https://cdn.myanimelist.net/images/manga/3/266834.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("City", "Seinen", "https://cdn.myanimelist.net/images/manga/1/192291.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Death Note", "Shounen", "https://cdn.myanimelist.net/images/manga/1/258245.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Attack on Titan", "Shounen", "https://cdn.myanimelist.net/images/manga/2/37846.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("JoJo Part 7:Steel Ball Run", "Seinen", "https://cdn.myanimelist.net/images/manga/3/179882.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Vagabond", "Seinen", "https://cdn.myanimelist.net/images/manga/1/259070.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Monster", "Seinen", "https://cdn.myanimelist.net/images/manga/3/258224.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Slam Dunk", "Shounen", "https://cdn.myanimelist.net/images/manga/2/258749.webp");    
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Fullmetal Alchemist", "Shounen", "https://cdn.myanimelist.net/images/manga/3/243675.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Kingdom", "Seinen", "https://cdn.myanimelist.net/images/manga/2/171872.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("20th Century Boys", "Seinen", "https://cdn.myanimelist.net/images/manga/5/260006.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Real", "Seinen", "https://cdn.myanimelist.net/images/manga/2/115969.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Chainsaw Man", "Shounen", "https://cdn.myanimelist.net/images/manga/3/216464.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Tokyo Ghoul", "Shounen", "https://cdn.myanimelist.net/images/manga/3/194456.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Solo Leveling", "Shounen", "https://cdn.myanimelist.net/images/manga/3/222295.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("One-Punch Man", "Seinen", "https://cdn.myanimelist.net/images/manga/3/80661.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("My Hero Academia", "Shounen", "https://cdn.myanimelist.net/images/manga/1/209370.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Naruto", "Shounen", "https://cdn.myanimelist.net/images/manga/3/249658.webp");
	INSERT INTO MANGA (nome, demografia, img_URL)
	values ("Jujutsu Kaisen", "Shounen", "https://cdn.myanimelist.net/images/manga/3/210341.webp");

    

CREATE TABLE VETRINA_0(
	nome varchar(40),
    primary key (nome),
    foreign key (nome) references MANGA(nome)
);

	INSERT INTO VETRINA_0 (nome)
	values ("Yotsuba&!");
	INSERT INTO VETRINA_0 (nome)
	values ("Berserk");
	INSERT INTO VETRINA_0 (nome)
	values ("Frieren: Beyond Journey's End");
	INSERT INTO VETRINA_0 (nome)
	values ("Mob Psycho 100");
	INSERT INTO VETRINA_0 (nome)
	values ("Nichijou - My Ordinary Life");
	INSERT INTO VETRINA_0 (nome)
	values ("Ping Pong");
	INSERT INTO VETRINA_0 (nome)
	values ("Girls' Last Tour");
	INSERT INTO VETRINA_0 (nome)
	values ("Azumanga Daioh: The Animation");
	INSERT INTO VETRINA_0 (nome)
	values ("Bocchi the Rock!");
	INSERT INTO VETRINA_0 (nome)
	values ("Dragon Ball");
	INSERT INTO VETRINA_0 (nome)
	values ("Demon Slayer: Kimetsu no Yaiba");
	INSERT INTO VETRINA_0 (nome)
	values ("Shimeji Simulation");


CREATE TABLE VETRINA_1(
	nome varchar(40),
    primary key (nome),
    foreign key (nome) references MANGA(nome)
);

	INSERT INTO VETRINA_1 (nome)
	values ("Berserk");
	INSERT INTO VETRINA_1 (nome)
	values ("JoJo Part 7:Steel Ball Run");
	INSERT INTO VETRINA_1 (nome)
	values ("Vagabond");
	INSERT INTO VETRINA_1 (nome)
	values ("One Piece");
	INSERT INTO VETRINA_1 (nome)
	values ("Monster");
	INSERT INTO VETRINA_1 (nome)
	values ("Slam Dunk");
	INSERT INTO VETRINA_1 (nome)
	values ("Vinland Saga");
	INSERT INTO VETRINA_1 (nome)
	values ("Fullmetal Alchemist");
	INSERT INTO VETRINA_1 (nome)
	values ("Goodnight Punpun");
	INSERT INTO VETRINA_1 (nome)
	values ("Kingdom");
	INSERT INTO VETRINA_1 (nome)
	values ("20th Century Boys");
	INSERT INTO VETRINA_1 (nome)
	values ("Real");
    
    CREATE TABLE VETRINA_2(
	nome varchar(40),
    primary key (nome),
    foreign key (nome) references MANGA(nome)
);

	INSERT INTO VETRINA_2 (nome)
	values ("Berserk");
	INSERT INTO VETRINA_2 (nome)
	values ("Attack on Titan");
	INSERT INTO VETRINA_2 (nome)
	values ("One Piece");
	INSERT INTO VETRINA_2 (nome)
	values ("Chainsaw Man");
	INSERT INTO VETRINA_2 (nome)
	values ("Tokyo Ghoul");
	INSERT INTO VETRINA_2 (nome)
	values ("Solo Leveling");
	INSERT INTO VETRINA_2 (nome)
	values ("One-Punch Man");
	INSERT INTO VETRINA_2 (nome)
	values ("Goodnight Punpun");
	INSERT INTO VETRINA_2 (nome)
	values ("Demon Slayer: Kimetsu no Yaiba");
	INSERT INTO VETRINA_2 (nome)
	values ("My Hero Academia");
	INSERT INTO VETRINA_2 (nome)
	values ("Jujutsu Kaisen");
	INSERT INTO VETRINA_2 (nome)
	values ("Naruto");


CREATE TABLE UTENTI(
	username varchar(40),
    password varchar(40),
    primary key (username)
);

CREATE TABLE CARRELLO(
	id integer auto_increment,
	mal_id integer,
	nome_manga varchar(40),
    img_URL varchar (400),
    
    username varchar(40),
    foreign key (username) references UTENTI(username),
    
    primary key (id)
);