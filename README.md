Telegramm
=========

Command Types
-------------

Configuration
-------------

Your **telegramm** configuration is placed in ```/config``` folder.

    /config
    |-- commands    - Commands configuration in JSON files
    |-- controllers - PHP Controllers
    |-- scripts     - SH Scripts

### Commands Configuration

#### Standard Fields
**Required Fields**

+ name - command name, must be unique in the system
+ type - type of command

**Optional Fields**

+ title - Command title (one line description)
+ description - Description of command

#### Types Configuration

* Alias
    * Required Fields
        * **alias** - name of command which is alias of
    * Example
        ```JSON
        {
            "name": "help",
            "type": "alias",
            "alias": "list"
        }
        ```
* Command
    * Required Fields
        * **command** - command line to execute
    * Example
        ```JSON
        {
            "name": "list-dir",
            "type": "command",
            "command": "ls -la"
        }
        ```
* Script
* Controller
