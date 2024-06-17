-- Afficher toutes les données
SELECT * FROM students;

-- Afficher uniquement les prénoms
SELECT prenom FROM students;

-- Afficher les prénoms, les dates de naissance et l’école de chacun
SELECT prenom, datenaissance, school FROM students;

-- Afficher uniquement les élèves qui sont de sexe féminin
SELECT * FROM students WHERE genre = 'F';

-- Afficher l'école de l'élève dont le nom de famille est Addy
SELECT school FROM students WHERE nom = 'Addy';

-- Utiliser le résultat de la première requête comme condition dans la seconde requête pour filtrer les élèves de la même école
SELECT * FROM students WHERE school = (
    SELECT school FROM students WHERE nom = 'Addy'
);

-- Afficher les prénoms par ordre inverse à l’alphabet (DESC)
SELECT prenom
FROM students 
ORDER BY prenom DESC;

-- Afficher les prénoms par ordre inverse à l’alphabet (DESC) et limiter les résultats à 2
SELECT prenom
FROM students 
ORDER BY prenom DESC 
LIMIT 2;

-- Ajouter un étudiant
INSERT INTO students (nom, prenom, datenaissance, genre, school)
VALUES ('Dalor', 'Ginette', '1930-01-01', 'F','1');

-- Modifier l'étudiant Ginette en changeant son sexe et son prénom
UPDATE students
SET prenom = 'Omer', genre = 'M'
WHERE prenom = 'Ginette' AND nom = 'Dalor';

-- Supprimer la personne dont l'id est 3
DELETE FROM students
WHERE idStudent = 3;

-- Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Liege" et "2" soit remplacé par "Gent".
UPDATE school
SET school = CASE 
    WHEN idschool = '1' THEN 'Liege'
    WHEN idschool = '2' THEN 'Gent'
    WHEN idschool = '3' THEN 'Genk'
    WHEN idschool = '4' THEN 'Anvers'
    ELSE idschool 
    END;






