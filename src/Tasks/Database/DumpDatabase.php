<?php namespace BigName\BackupManager\Tasks\Database;

use BigName\BackupManager\Tasks\Task;
use BigName\BackupManager\Databases\Database;
use BigName\BackupManager\Shell\ShellProcessor;
use BigName\BackupManager\Shell\ShellProcessFailed;

/**
 * Class DumpDatabase
 * @package BigName\BackupManager\Tasks\Database
 */
class DumpDatabase implements Task
{
    /**
     * @var string
     */
    private $outputPath;
    /**
     * @var ShellProcessor
     */
    private $shellProcessor;
    /**
     * @var Database
     */
    private $database;

    /**
     * @param Database $database
     * @param $outputPath
     * @param ShellProcessor $shellProcessor
     */
    public function __construct(Database $database, $outputPath, ShellProcessor $shellProcessor)
    {
        $this->outputPath = $outputPath;
        $this->shellProcessor = $shellProcessor;
        $this->database = $database;
    }

    /**
     * @throws ShellProcessFailed
     */
    public function execute()
    {
        return $this->shellProcessor->process($this->database->getDumpCommandLine($this->outputPath));
    }
}
