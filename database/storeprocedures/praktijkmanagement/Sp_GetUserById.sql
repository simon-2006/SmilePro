-- Stored procedure: sp_GetUserById
DROP PROCEDURE IF EXISTS sp_GetUserById;
CREATE PROCEDURE sp_GetUserById(IN p_Id INT)
BEGIN
    SELECT id, name, email, rolename
    FROM users
    WHERE id = p_Id;
END;