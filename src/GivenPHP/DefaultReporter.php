<?php
namespace GivenPHP;

use GivenPHP\IReporter;
use GivenPHP\Output;

/**
 * The default reporter for GivenPHP
 * If no reporter is specified, this reporter will be used
 */
class DefaultReporter implements IReporter
{

    /**
     * Outputs GivenPHP version and an empty line
     */
    public function reportStart($version) {
        Output::message('GivenPHP v' . $version . PHP_EOL . PHP_EOL);
    }

    /**
     * Prints out a simple . character for each passing test
     */
    public function reportSuccess($count, $description) {
        Output::message('.');
    }

    /**
     * Prints an F character for each failing test
     */
    public function reportFailure($count, $description) {
        Output::message('F', Output::RED);
    }

    /**
     * Renders any errors with matching labels
     */
    private function renderErrors($errors, $labels) {
        foreach ($errors AS $i => $error) $error->render($i + 1, $labels[$i]);
    }

    /**
     * Renders a status message using total and totalErrors values
     * @example 10 examples, 2 failures
     * @param int $total
     * @param int $totalErrors
     */
    private function renderStatusMessage($total, $totalErrors) {
        $hasErrors = $totalErrors > 0;
        $message  = PHP_EOL . PHP_EOL;
        $message .= $total . ' examples, ' . $totalErrors . ' failures';
        Output::message($message, $hasErrors ?  Output::RED : Output::GREEN);
    }

    /**
     * Renders a 'Failed examples' error summary block 
     */
    private function renderErrorSummaries($errors) {
        if (!empty($errors)) 
            Output::message(PHP_EOL . PHP_EOL . 'Failed examples:');

        foreach ($errors AS $error) $error->summary();
    }

    /**
     * Prints out a result summary and if there are any test failures,
     * prints out error details
     * @param  int $total     - total number of tests run
     * @param  array $errors  - array of error objects
     * @param  array $labels  - array of labels corresponding to errors
     * @param  array $results - array of results
     */
    public function reportEnd($total, $errors, $labels, $results) {
        $this->renderErrors($errors, $labels);
        $this->renderStatusMessage($total, count($errors));
        $this->renderErrorSummaries($errors);
        Output::message(PHP_EOL);
    }
}