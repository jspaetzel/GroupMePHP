<?php
$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer' => true,
        '@DoctrineAnnotation' => true,
        'blank_line_before_statement' => ['statements' => ['return']],
        'concat_space' => ['spacing' => 'one'],
        'declare_parentheses' => true,
        'global_namespace_import' => true,
        'increment_style' => false,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'phpdoc_line_span' => ['property' => 'single'],
        'phpdoc_separation' => false,
        'phpdoc_summary' => false,
        'php_unit_internal_class' => false,
        'php_unit_test_class_requires_covers' => false,
        'single_line_throw' => false,
        'yoda_style' => false,
    ])
    ->setFinder($finder);