				<?php
                    echo $this->Form->input('action.type', array(
                                'between' => '<span class="select-wrapper">',
                                'after' => '</span>',
                                'empty' => __('Bulk Actions'),
                                'div' => false,
                                'label' => false,
                                'options' => $options,

                            )
                    );
                    echo $this->Form->button(__('Go'), array('class' => 'button'));
                ?>
