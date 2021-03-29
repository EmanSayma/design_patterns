<?php

class Light 
{
    private $place;
    public function __construct($place)
    {
        $this->place = $place;
    }

    public function on()
    {
        echo "{$this->place} Light is On \n";
    }

    public function off()
    {
        echo "{$this->place} Light is Off \n";
    }
}

class CeilingFan 
{
    // high() medium() low() off() getSpeed()
    const HIGH = 3;
    const MEDIUM = 2;
    const LOW = 1;
    const OFF = 0;
    private $place;
    private $speed;

    public function __construct($place)
    {
        $this->place = $place;
    }

    public function high()
    {
        $this->speed = self::HIGH;
        echo "{$this->place} Ceiling Fan speed is high \n";
    }

    public function medium()
    {
        $this->speed = self::MEDIUM;
        echo "{$this->place} Ceiling Fan speed is medium \n";
    }

    public function low()
    {
        $this->speed = self::LOW;
        echo "{$this->place} Ceiling Fan speed is low \n";
    }

    public function off()
    {
        $this->speed = self::OFF;
        echo "{$this->place} Ceiling Fan is off \n";
    }

    public function getSpeed()
    {
        return $this->speed;
    }
}

interface Command
{
    public function execute();
    public function undo();
}

class LightOnCommand implements Command
{
    private $light;
    
    public function __construct(Light $light)
    {
        $this->light = $light;
    }
    
    public function execute()
    {
        $this->light->on();
    }

    public function undo()
    {
        $this->light->off();
    }
}

class LightOffCommand implements Command
{
    private $light;
    
    public function __construct(Light $light)
    {
        $this->light = $light;
    }
    
    public function execute()
    {
        $this->light->off();
    }

    public function undo()
    {
        $this->light->on();
    }
}

class CeilingFanHighCommand implements Command
{
    private $ceilingFan;
    private $prevSpeed;
    
    public function __construct(CeilingFan $ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }
    
    public function execute()
    {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->high();
    }

    public function undo()
    {
        if ($this->prevSpeed == CeilingFan::HIGH) {
            $this->ceilingFan->high();
        } else if ($this->prevSpeed == CeilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } else if ($this->prevSpeed == CeilingFan::LOW) {
            $this->ceilingFan->low();
        } else if ($this->prevSpeed == CeilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}

class CeilingFanMediumCommand implements Command
{
    private $ceilingFan;
    private $prevSpeed;
    
    public function __construct(CeilingFan $ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }
    
    public function execute()
    {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->medium();
    }

    public function undo()
    {
        if ($this->prevSpeed == CeilingFan::HIGH) {
            $this->ceilingFan->high();
        } else if ($this->prevSpeed == CeilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } else if ($this->prevSpeed == CeilingFan::LOW) {
            $this->ceilingFan->low();
        } else if ($this->prevSpeed == CeilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}

class CeilingFanLowCommand implements Command
{
    private $ceilingFan;
    private $prevSpeed;
    
    public function __construct(CeilingFan $ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }
    
    public function execute()
    {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->low();
    }

    public function undo()
    {
        if ($this->prevSpeed == CeilingFan::HIGH) {
            $this->ceilingFan->high();
        } else if ($this->prevSpeed == CeilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } else if ($this->prevSpeed == CeilingFan::LOW) {
            $this->ceilingFan->low();
        } else if ($this->prevSpeed == CeilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}

class CeilingFanOffCommand implements Command
{
    private $ceilingFan;
    private $prevSpeed;
    
    public function __construct(CeilingFan $ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }
    
    public function execute()
    {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->off();
    }

    public function undo()
    {
        if ($this->prevSpeed == CeilingFan::HIGH) {
            $this->ceilingFan->high();
        } else if ($this->prevSpeed == CeilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } else if ($this->prevSpeed == CeilingFan::LOW) {
            $this->ceilingFan->low();
        } else if ($this->prevSpeed == CeilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}

class GarageDoor 
{
    public function up()
    {
        echo "Garage Door is Open \n";
    }

    public function down()
    {
        echo "Garage Door is closed \n";
    }

    public function stop()
    {
        echo "Garage Door Stop moving \n";
    }

    public function lightOn()
    {
        echo "Garage Light is On \n";
    }

    public function lightOff()
    {
        echo "Garage Light is Off \n";
    }
}

class GarageDoorUpCommand implements Command
{
    private $garageDoor;

    public function __construct($garageDoor)
    {
        $this->garageDoor = $garageDoor;
    }
    
    public function execute()
    {
        $this->garageDoor->up();
    }

    public function undo()
    {
        # code...
    }
}

class GarageDoorDownCommand implements Command
{
    private $garageDoor;

    public function __construct($garageDoor)
    {
        $this->garageDoor = $garageDoor;
    }
    
    public function execute()
    {
        $this->garageDoor->down();
    }

    public function undo()
    {
        # code...
    }
}

class Stereo
{
    public function on()
    {
        echo "Stereo is On \n";
    }

    public function off()
    {
        echo "Stereo is Off \n";
    }

    public function setCd()
    {
        echo "Stereo Cd set \n";
    }

    public function setDvd()
    {
        echo "Stereo DVD set \n";
    }

    public function setRadio()
    {
        echo "Stereo Radio set \n";
    }

    public function setVolume(int $volume)
    {
        echo "Stereo Volume set to ${volume} \n";
    }
}

class StereoOnWithCDCommand implements Command
{
    private $stereo;
    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute()
    {
        $this->stereo->on();
        $this->stereo->setCd();
        $this->stereo->setVolume(11);
    }

    public function undo()
    {
        # code...
    }
}

class StereoOffCommand implements Command
{
    private $stereo;
    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute()
    {
        $this->stereo->off();
    }

    public function undo()
    {
        # code...
    }
}

class SimpleRemoteControl 
{
    private $slot;

    public function setCommand(Command $command)
    {
        $this->slot = $command;
    }

    public function buttonWasPressed()
    {
        $this->slot->execute();
    }
}

class RemoteControlTest 
{
    public function __construct()
    {
        $remote = new SimpleRemoteControl();
        $light = new Light("");
        $lightOn = new LightOnCommand($light);

        $remote->setCommand($lightOn);
        $remote->buttonWasPressed();
    }
}

class RemoteControlTest2 
{
    public function __construct()
    {
        $remote = new SimpleRemoteControl();
        $light = new Light("");
        $lightOn = new LightOnCommand($light);

        $garageDoor = new GarageDoor();
        $garageDoorUpCommand = new GarageDoorUpCommand($garageDoor);

        $remote->setCommand($lightOn);
        $remote->buttonWasPressed();
        $remote->setCommand($garageDoorUpCommand);
        $remote->buttonWasPressed();
    }
}

// $test = new RemoteControlTest();
// echo "\n=======================\n";
// $test2 = new RemoteControlTest2();


class RemoteControl
{
    private $onCommands = [];
    private $offCommands = [];
    private $undoCommand;

    public function __construct()
    {
        for($i=0; $i<7; $i++) {
            $this->onCommands[$i] = new NoCommand();
            $this->offCommands[$i] = new NoCommand();
        }

        $this->undoCommand = new NoCommand();
    }

    public function setCommand(int $slot, Command $onCommand, Command $offCommand)
    {
        $this->onCommands[$slot] = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }

    public function onButtonWasPressed(int $slot)
    {
        $this->onCommands[$slot]->execute();
        $this->undoCommand = $this->onCommands[$slot];
    }

    public function offButtonWasPressed(int $slot)
    {
        $this->offCommands[$slot]->execute();
        $this->undoCommand = $this->offCommands[$slot];
    }

    public function undoButtonWasPushed()
    {
        $this->undoCommand->undo();
    }

    public function toString()
    {
        echo "\n ----------Remote Control -------\n";
        
        for($i = 0; $i<count($this->onCommands)  ; $i++) {
           echo "[slot ${i}] " . get_class($this->onCommands[$i]) . "   " . get_class($this->offCommands[$i]) . "\n";
        }

        echo "[undo] ". get_class($this->undoCommand) ." \n\n";
    }
}

class NoCommand implements Command
{
    public function execute() {}
    public function undo() {}

}

class RemoteLoader
{
    public function __construct()
    {
        $remote = new RemoteControl();

        $livingRoomLight = new Light("Living Room");
        $kitchenLight = new Light("Kitchen");
        $garageDoor = new GarageDoor();
        $stereo = new Stereo();

        $livingRoomLightOn = new LightOnCommand($livingRoomLight);
        $livingRoomLightOff = new LightOffCommand($livingRoomLight);
        $kitchenLightOn = new LightOnCommand($kitchenLight);
        $kitchenLightOff = new LightOffCommand($kitchenLight);

        $garageDoorUp = new GarageDoorUpCommand($garageDoor);
        $garageDoorDown = new GarageDoorDownCommand($garageDoor);

        $stereoOnWithCD = new StereoOnWithCDCommand($stereo);
        $stereoOff = new StereoOffCommand($stereo);

        $remote->setCommand(0, $livingRoomLightOn, $livingRoomLightOff);
        $remote->setCommand(1, $kitchenLightOn, $kitchenLightOff);
        $remote->setCommand(2, $garageDoorUp, $garageDoorDown);
        $remote->setCommand(3, $stereoOnWithCD, $stereoOff);

        $remote->toString();

        $remote->onButtonWasPressed(0);
        $remote->offButtonWasPressed(0);
        $remote->onButtonWasPressed(1);
        $remote->offButtonWasPressed(1);
        $remote->onButtonWasPressed(2);
        $remote->offButtonWasPressed(2);
        $remote->onButtonWasPressed(3);
        $remote->offButtonWasPressed(3);
    }
}

$remoteLoader = new RemoteLoader();

echo "\n===========================\n";

class RemoteLoader2
{
    public function __construct()
    {
        $remote = new RemoteControl();

        $livingRoomLight = new Light("Living Room");
        
        $livingRoomLightOn = new LightOnCommand($livingRoomLight);
        $livingRoomLightOff = new LightOffCommand($livingRoomLight);

        $remote->setCommand(0, $livingRoomLightOn, $livingRoomLightOff);


        $remote->onButtonWasPressed(0);
        $remote->offButtonWasPressed(0);
        $remote->toString();
        $remote->undoButtonWasPushed();
        $remote->offButtonWasPressed(0);
        $remote->onButtonWasPressed(0);
        $remote->toString();
        $remote->undoButtonWasPushed();
    }
}

$remoteLoader = new RemoteLoader2();


echo "\n===========================\n";

class RemoteLoader3
{
    public function __construct()
    {
        $remote = new RemoteControl();

        $ceilingFan = new CeilingFan("Living Room");
        
        $ceilingFanMedium = new CeilingFanMediumCommand($ceilingFan);
        $ceilingFanHigh = new CeilingFanHighCommand($ceilingFan);
        $ceilingFanOff = new CeilingFanOffCommand($ceilingFan);


        $remote->setCommand(0, $ceilingFanMedium, $ceilingFanOff);
        $remote->setCommand(1, $ceilingFanHigh, $ceilingFanOff);


        $remote->onButtonWasPressed(0);
        $remote->offButtonWasPressed(0);
        $remote->toString();
        $remote->undoButtonWasPushed();

        $remote->onButtonWasPressed(1);
        $remote->toString();
        $remote->undoButtonWasPushed();
    }
}

$remoteLoader = new RemoteLoader3();

class MacroCommand implements Command 
{
    private $commands;

    public function __construct(Array $commands)
    {
        $this->commands = $commands;
    }

    public function execute()
    {
        for ($i=0; $i<count($this->commands); $i++) {
            $this->commands[$i]->execute();
        }
    }

    public function undo()
    {
        for ($i=count($this->commands) - 1; $i >= 0; $i--) {
            $this->commands[$i]->undo();
        }
    }
}

echo "\n===========================\n";

class RemoteLoader4
{
    public function __construct()
    {
        $remote = new RemoteControl();
        $livingRoomLight = new Light("Living Room");
        $kitchenLight = new Light("Kitchen");
        $garageDoor = new GarageDoor();
        $stereo = new Stereo();

        $livingRoomLightOn = new LightOnCommand($livingRoomLight);
        $livingRoomLightOff = new LightOffCommand($livingRoomLight);
        $kitchenLightOn = new LightOnCommand($kitchenLight);
        $kitchenLightOff = new LightOffCommand($kitchenLight);

        $garageDoorUp = new GarageDoorUpCommand($garageDoor);
        $garageDoorDown = new GarageDoorDownCommand($garageDoor);

        $stereoOnWithCD = new StereoOnWithCDCommand($stereo);
        $stereoOff = new StereoOffCommand($stereo);

        $partyOn = [$livingRoomLightOn, $kitchenLightOn, $garageDoorUp, $stereoOnWithCD];
        $partyOff = [$livingRoomLightOff, $kitchenLightOff, $garageDoorDown, $stereoOff];

        $partyOnMacro = new MacroCommand($partyOn);
        $partyOffMacro = new MacroCommand($partyOff);


        $remote->setCommand(0, $partyOnMacro, $partyOffMacro);


        $remote->toString();
        echo "----Pushing Macro On----";
        $remote->onButtonWasPressed(0);
        echo "----Pushing Macro off----";
        $remote->offButtonWasPressed(0);
    }
}

$remoteLoader = new RemoteLoader4();