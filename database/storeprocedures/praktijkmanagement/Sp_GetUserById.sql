USE Breezedemo;

DROP PROCEDURE IF EXISTS sp_GetUserById;

DELIMITER //

CREATE PROCEDURE sp_GetUserById(
    IN p_Id INT
)
BEGIN
    SELECT USRS.id,
           USRS.name,
           USRS.email,
           USRS.rolename    
    FROM users AS USRSs
    WHERE USRS.Id = p_Id;
        
END $$

DELIMITER ;