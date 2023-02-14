/*CREATE TABLE `assessment`(
`date` DATETIME,
`username` varchar(128),
`score` float
);
*/

SELECT DAY(date) AS 'DAY', 
SUM(case when score > 0 then score else 0 end) AS 'num_pos_scores', 
SUM(case when score < 0 then score else 0 end) AS 'num_neg_scores' 
FROM `assessment`
WHERE DATE BETWEEN '2011-03-01' AND '2011-04-30'
GROUP BY DATE;

SELECT * 
FROM `assessment`
WHERE DATE BETWEEN '2011-01-01' AND '2011-06-30'
AND score > 0;
