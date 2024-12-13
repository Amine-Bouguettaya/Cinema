-- a. INFORMATION FILM

SELECT f.titre, f.annee_sortie, SUBSTRING(SEC_TO_TIME(f.duree * 60), 1, 5) AS duree, CONCAT(p.nom, ' ', p.prenom) AS Realisateur
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE f.id_film = 1;

-- b. list des films dont la durée exède 2h15 (classé par durée du + long au + court)

SELECT f.titre, f.annee_sortie, SUBSTRING(SEC_TO_TIME(f.duree * 60), 1, 5) AS duree, CONCAT(p.nom, ' ', p.prenom) AS Realisateur
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE f.duree > 135
ORDER	BY f.duree DESC;

-- c. Liste des films d'un realisateur en précisant l'année de sortie

SELECT f.titre, f.annee_sortie
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
WHERE r.id_realisateur = 1;

-- d. Nombre de film par genre (classé dans l'ordre décroissant)

SELECT g.nom_genre , COUNT(gf.id_film) AS nbFilm
FROM genre g 
INNER JOIN genre_film gf
ON g.id_genre = gf.id_genre
GROUP BY g.nom_genre
ORDER BY nbFilm DESC;

-- e. Nombre de films par réalisateur (classés dans l'ordre décroissant)

SELECT p.nom , COUNT(f.id_film) AS nbFilm
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
GROUP BY p.nom
ORDER BY nbFilm DESC;

-- f. Casting d'un film en particulier (id_film): nom prenom des acteurs + sexe

SELECT p.nom , p.prenom, p.sexe
FROM film f
INNER JOIN casting c ON f.id_film = c.id_film
INNER JOIN acteur a ON c.id_acteur = a.id_acteur
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE f.id_film = 1;

-- g. Films tournées par un acteur en particulier (id_acteur) avec leur rôle et l'année de sortie (du film le plus recent au plus ancien)

SELECT f.titre, r.nom_role, f.annee_sortie
FROM film f
INNER JOIN casting c ON f.id_film = c.id_film
INNER JOIN ROLE r ON c.id_role = r.id_role
INNER JOIN acteur a ON c.id_acteur = a.id_acteur
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE a.id_acteur = 1
ORDER BY f.annee_sortie DESC;

-- h. Liste des personnes qui sont à la fois acteurs et rélisateurs.

SELECT p.nom,  p.prenom
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
INNER JOIN realisateur r ON p.id_personne = r.id_personne
WHERE a.id_personne = r.id_personne;

-- i. Liste des films qui ont moins de 5ans (classé du plus récent au plus ancien)

SELECT f.titre, f.annee_sortie
FROM film f
WHERE f.annee_sortie >= YEAR(NOW()) - 5
ORDER BY f.annee_sortie DESC;

-- j. Nombre d'homme et de femme parmi les acteurs

SELECT p.sexe, COUNT(p.sexe) AS nbSexe
FROM acteur a
INNER JOIN personne p ON a.id_personne = p.id_personne
GROUP BY p.sexe;

-- k. liste des acteurs ayant plus de 50 ans (age révolu et non révolu)

SELECT p.nom, FLOOR(DATEDIFF(NOW(), p.date) / 365) AS age
FROM acteur a
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE FLOOR(DATEDIFF(NOW(), p.date) / 365.25) > 50;

-- l. Acteur ayant joué dans 3 films ou plus

SELECT p.nom
FROM acteur a
INNER JOIN casting c ON a.id_acteur = c.id_acteur
INNER JOIN personne p ON a.id_personne = p.id_personne
GROUP BY p.nom
HAVING COUNT(c.id_acteur >= 3)
