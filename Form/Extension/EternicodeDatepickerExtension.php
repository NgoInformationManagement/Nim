<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Extension;

use NIM\FormBundle\Form\DataHtml5TransformerTrait;
use NIM\FormBundle\Form\FormToolsTrait;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EternicodeDatepickerExtension extends AbstractTypeExtension
{
    use FormToolsTrait;

    const JQUERY_PROTOTYPE_NAME = 'datepicker';

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $this->addAttributeToFormView($view, 'render_type', self::JQUERY_PROTOTYPE_NAME);
        $this->addDataAttributeToFormView($view, 'plugin-name', self::JQUERY_PROTOTYPE_NAME);
        $this->addDataAttributeToFormView($view, 'date-format', $this->getDatepickerPattern($options['format']));

        $this->addDataAttributeToFormViewFromOptions($view, $options, 'autoclose');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'before_show_day');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'calendar_weeks');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'clear_btn');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'days_of_week_disabled');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'end_date');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'force_parse');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'inputs');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'keyboard_navigation');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'language');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'min_view_mode');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'orientation');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'start_date');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'start_view');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'today_btn');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'today_highlight');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'week_start');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
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

        $resolver->setOptional(array(
            'autoclose',
            'before_show_day',
            'calendar_weeks',
            'clear_btn',
            'days_of_week_disabled',
            'end_date',
            'force_parse',
            'inputs',
            'keyboard_navigation',
            'language',
            'min_view_mode',
            'orientation',
            'start_date',
            'start_view',
            'today_btn',
            'today_highlight',
            'week_start'
        ));

        $resolver->setAllowedTypes(array(
            'autoclose' => array('bool'),
            'before_show_day' => array('string'),
            'calendar_weeks' => array('bool'),
            'clear_btn' => array('bool'),
            'days_of_week_disabled' => array('array'),
            'end_date' => array('string'),
            'force_parse' => array('bool'),
            'inputs' => array('array'),
            'keyboard_navigation' => array('bool'),
            'language' => array('string'),
            'min_view_mode' => array('string', 'integer'),
            'orientation' => array('string'),
            'start_date' => array('string'),
            'start_view' => array('string', 'integer'),
            'today_btn' => array('bool'),
            'today_highlight'  => array('bool'),
            'week_start' => array('integer')
        ));

        $resolver->setDefaults(array(
            'format' => $format,
            'language' => \Locale::getDefault()
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
