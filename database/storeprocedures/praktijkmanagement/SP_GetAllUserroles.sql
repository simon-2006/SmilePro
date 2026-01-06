USE Breezedemo;

DROP PROCEDURE IF EXISTS sp_GetUserById;

DELIMITER //

CREATE PROCEDURE sp_GetUserroles()

BEGIN

    SELECT DISTINCT(USRS.rolename)    
    FROM users AS USRS
    
        
END $$

DELIMITER ;