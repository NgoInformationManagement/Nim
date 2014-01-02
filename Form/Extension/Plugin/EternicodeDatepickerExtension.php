<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Extension\Plugin;

use NIM\FormBundle\Form\Extension\Plugin\AbstractPluginExtension;
use NIM\FormBundle\Form\FormToolsTrait;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EternicodeDatepickerExtension extends AbstractPluginExtension
{
    use FormToolsTrait;

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('plugin_rendered', $options) && $options['plugin_rendered'] != 'none') {
            $this->addDataAttributeToFormView($view, 'date-format', $this->getDatepickerPattern($options['format']));

            parent::buildView($view, $form, $options);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $format = function (Options $options) {
            if ($options['widget'] === 'single_text') {
                $formatter = new \IntlDateFormatter(
                    \Locale::getDefault(),
                    \IntlDateFormatter::SHORT,
                    \IntlDateFormatter::NONE
                );

                return $this->replaceInString('yy', 'yyyy', $formatter->getPattern());
            }

            return $options['format'];
        };

        $resolver->setDefaults(array(
            'format' => $format,
            'language' => \Locale::getDefault(),
            'widget' => 'single_text',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'date';
    }

    /**
     * {@inheritdoc}
     */
    protected function getPrototypeName()
    {
        return 'datepicker';
    }

    /**
     * {@inheritdoc}
     */
    protected function getPluginOptions()
    {
        return array(
            'plugin_rendered'=> array(
                'default' => 'plugin',
                'allowed_types' => array('string'),
                'allowed_value' => array('plugin', 'none'),
            ),
            'autoclose' =>  array(
                'allowed_types' => array('bool'),
                'default' => true,
            ),
            'before_show_day' =>  array('allowed_types' => array('string')),
            'calendar_weeks' =>  array('allowed_types' => array('bool')),
            'clear_btn' =>  array('allowed_types' => array('bool')),
            'days_of_week_disabled' => array('allowed_types' => array('array')),
            'end_date' => array('allowed_types' => array('string')),
            'force_parse' => array('allowed_types' => array('bool')),
            'inputs' => array('allowed_types' => array('array')),
            'keyboard_navigation' => array('allowed_types' => array('bool')),
            'language' => array('allowed_types' => array('string')),
            'min_view_mode' => array('allowed_types' => array('string', 'integer')),
            'orientation' => array( 'allowed_types' => array('string'),),
            'start_date' => array('allowed_types' => array('string')),
            'start_view' => array('allowed_types' => array('string', 'integer')),
            'today_btn' => array('allowed_types' => array('bool')),
            'today_highlight' => array('allowed_types' => array('bool')),
            'week_start' => array('allowed_types' => array('integer')),
        );
    }

    /**
     * Get the datepicker date pattern
     *
     * @param $formPattern
     * @return string
     */
    private function getDatepickerPattern($formPattern)
    {
        $formPattern = $this->replaceInString('y', 'yyyy', $formPattern);
        $formPattern = $this->replaceInString('M', 'mm', $formPattern);
        $formPattern = $this->replaceInString('MM', 'mm', $formPattern);
        $formPattern = $this->replaceInString('MMM', 'M', $formPattern);
        $formPattern = $this->replaceInString('MMMM', 'MM', $formPattern);

        return $formPattern;
    }

    /**
     * Replace the search string with the replacement string
     *
     * @param $search
     * @param $replace
     * @param $subject
     * @return mixed
     */
    private function replaceInString($search, $replace, $subject)
    {
        if (substr_count($subject, $search) == 1) {
            $subject = str_ireplace($search, $replace, $subject);
        }

        return $subject;
    }
}
