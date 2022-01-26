<?php
SELECT
    menuitems.ID,
    menuitems.Code,
    menuitems.Naam AS menuitems_naam,
    gerechtsoorten.ID AS Gerechtsoorten_ID,
    gerechtsoorten.Naam AS gerechtsoorten_naam,
    gerechtscategorien.Naam AS gerechtscategorien_naam
FROM
    `menuitems`
INNER JOIN gerechtsoorten ON gerechtsoorten.ID = menuitems.Gerechtsoort_ID
INNER JOIN gerechtscategorien ON gerechtscategorien.ID = gerechtsoorten.Gerechtscategorie_ID
WHERE gerechtscategorien.Naam = 'drank'
?>