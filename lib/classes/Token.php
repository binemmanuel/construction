<?php
class Token extends User
{
    private $token_id;
    private $user_id;
    private $token;
    private $token_created_on;

    function __construct(
        int $token_id = null,
        int $user_id = null,
        string $token = null,
        string $token_created_on = null
    )
    {
        $this->token_id = (int) (!empty($token_id)) ? $token_id : 0;
        $this->user_id = (int) (!empty($user_id)) ? $user_id : parent::get_id();
        $this->token = (string) $token;
        $this->token_created_on = (string) $token_created_on;
    }

    public function get_token(): string
    {
        return $this->token;
    }

    public function set_user_id($id)
    {
        $this->user_id = $id;
    }
    
    public function set_token($token)
    {
        $this->token = $token;
    }

    public function save(): bool
    {
        // Include our connection file.
        include LIB_DIR .'conn.php';

        // Prepare an SQL statement.
        $stmt = $conn->prepare(
            'INSERT INTO 
                tokens(
                    user_id,
                    token
                )
                values
                    (?, ?)'
        );

        // Bind parameters.
        $stmt->bind_param('is',
            $this->user_id,
            $this->token
        );

        // Execute query.
        if ($stmt->execute()) {
            return true;
        }

        // Close connection.
        $conn->close();

        // Close statement.
        $stmt->close();

        return false;
    }

    public function verify(): bool
    {
        // Include our connection file.
        include LIB_DIR .'conn.php';

        // Prepare an sql statement.
        $stmt = $conn->prepare(
            'SELECT 
                token
            FROM
                tokens 
            WHERE 
                user_id = ?'
        );

        // Bind param.
        $stmt->bind_param('i', $this->user_id);

        // Execute query.
        $stmt->execute();

        // Bind the result value.
        $stmt->bind_result($token);

        // Fetch user data.
        $stmt->fetch();

        // Verify token
        if ($this->token === $token) {
            return true;
        
        }

        // Close connection and statement.
        $stmt->close();
        $conn->close();

        // Return user data.
        return false;
    }

    /**
     * Deletes a user account.
     */
    public function del(): bool
    {
        // Include our connection file.
        include LIB_DIR .'conn.php';

        // Prepare an SQL statement.
        $stmt = $conn->prepare(
            'DELETE FROM 
                tokens 
            WHERE 
                token = ?'
        );

        // Bind parameter.
        $stmt->bind_param('s', $this->token);

        // Execute query.
        if ($stmt->execute()) {
            return true;
        }

        // Close connection.
        $conn->close();

        // Close statement.
        $stmt->close();

        return false;
    }

}
