require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class QuestionServer implements MessageComponentInterface {
    protected $clients;
    protected $currentQuestionId;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
        $this->currentQuestionId = 1; // Set the initial question ID to 1
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
        $conn->send($this->currentQuestionId); // Send the current question ID to the new client
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Message received: {$msg}\n";
        $this->currentQuestionId = $msg; // Update the current question ID when a new one is received
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg); // Send the new question ID to all clients except the sender
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection closed! ({$conn->resourceId})\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new QuestionServer()
        )
    ),
    8080
);

$server->run();
