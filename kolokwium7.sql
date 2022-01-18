SELECT h.nazwa_hurtowni
FROM hurtownie h JOIN odleglosci o
ON h.id_hurtowni = o.id_hurtowni
WHERE COUNT(odleglosc) > 0

SELECT s.nazwa_sklepu, s.miejscowosc, COUNT(h.id_hurtowni)
FROM hurtownie h JOIN odleglosci o JOIN sklepy s ON h.id_hurtowni = o.id_hurtowni AND s.id_sklepu = o.id_sklepu
WHERE typ = 'OBUWIE' AND czas_przejazdu IS NOT NULL

SELECT MAX(zmierzony_dnia)
FROM