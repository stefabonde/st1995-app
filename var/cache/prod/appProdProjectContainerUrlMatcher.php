<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/client')) {
            // client_index
            if ('/client' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\ClientController::indexAction',  '_route' => 'client_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_client_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'client_index'));
                }

                return $ret;
            }
            not_client_index:

            // client_detail
            if (preg_match('#^/client/(?P<client>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'client_detail']), array (  '_controller' => 'AppBundle\\Controller\\ClientController::detailAction',));
            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/project')) {
            // project_index
            if ('/project' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\ProjectController::indexAction',  '_route' => 'project_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_project_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'project_index'));
                }

                return $ret;
            }
            not_project_index:

            // project_detail
            if (preg_match('#^/project/(?P<project>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'project_detail']), array (  '_controller' => 'AppBundle\\Controller\\ProjectController::detailAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if ('/profile' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'fos_user.profile.controller:showAction',  '_route' => 'fos_user_profile_show',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_fos_user_profile_show;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fos_user_profile_show'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_fos_user_profile_show;
                }

                return $ret;
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ('/profile/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.profile.controller:editAction',  '_route' => 'fos_user_profile_edit',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_profile_edit;
                }

                return $ret;
            }
            not_fos_user_profile_edit:

            // fos_user_change_password
            if ('/profile/change-password' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.change_password.controller:changePasswordAction',  '_route' => 'fos_user_change_password',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_change_password;
                }

                return $ret;
            }
            not_fos_user_change_password:

        }

        elseif (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/report')) {
                // report
                if ('/report' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ReportController::reportAction',  '_route' => 'report',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_report;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'report'));
                    }

                    return $ret;
                }
                not_report:

                // reportUser
                if ('/report/user' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\ReportController::reportUserAction',  '_route' => 'reportUser',);
                }

            }

            elseif (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if ('/register' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'fos_user.registration.controller:registerAction',  '_route' => 'fos_user_registration_register',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_fos_user_registration_register;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fos_user_registration_register'));
                    }

                    if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                        $allow = array_merge($allow, ['GET', 'POST']);
                        goto not_fos_user_registration_register;
                    }

                    return $ret;
                }
                not_fos_user_registration_register:

                // fos_user_registration_check_email
                if ('/register/check-email' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.registration.controller:checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_fos_user_registration_check_email;
                    }

                    return $ret;
                }
                not_fos_user_registration_check_email:

                if (0 === strpos($pathinfo, '/register/confirm')) {
                    // fos_user_registration_confirm
                    if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_registration_confirm']), array (  '_controller' => 'fos_user.registration.controller:confirmAction',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_fos_user_registration_confirm;
                        }

                        return $ret;
                    }
                    not_fos_user_registration_confirm:

                    // fos_user_registration_confirmed
                    if ('/register/confirmed' === $pathinfo) {
                        $ret = array (  '_controller' => 'fos_user.registration.controller:confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_fos_user_registration_confirmed;
                        }

                        return $ret;
                    }
                    not_fos_user_registration_confirmed:

                }

            }

            elseif (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ('/resetting/request' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.resetting.controller:requestAction',  '_route' => 'fos_user_resetting_request',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_fos_user_resetting_request;
                    }

                    return $ret;
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_resetting_reset']), array (  '_controller' => 'fos_user.resetting.controller:resetAction',));
                    if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                        $allow = array_merge($allow, ['GET', 'POST']);
                        goto not_fos_user_resetting_reset;
                    }

                    return $ret;
                }
                not_fos_user_resetting_reset:

                // fos_user_resetting_send_email
                if ('/resetting/send-email' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.resetting.controller:sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_fos_user_resetting_send_email;
                    }

                    return $ret;
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ('/resetting/check-email' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.resetting.controller:checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_fos_user_resetting_check_email;
                    }

                    return $ret;
                }
                not_fos_user_resetting_check_email:

            }

        }

        elseif (0 === strpos($pathinfo, '/task')) {
            // task_index
            if ('/task' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\TaskController::indexAction',  '_route' => 'task_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_task_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'task_index'));
                }

                return $ret;
            }
            not_task_index:

            // task_detail
            if (0 === strpos($pathinfo, '/task/detail') && preg_match('#^/task/detail/(?P<task>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'task_detail']), array (  '_controller' => 'AppBundle\\Controller\\TaskController::detailAction',));
            }

            // task_new
            if (0 === strpos($pathinfo, '/task/new') && preg_match('#^/task/new(?:/(?P<project>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'task_new']), array (  'project' => NULL,  '_controller' => 'AppBundle\\Controller\\TaskController::newAction',));
            }

            // task_edit
            if (preg_match('#^/task/(?P<task>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'task_edit']), array (  '_controller' => 'AppBundle\\Controller\\TaskController::editAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/time')) {
            // track_task_time
            if ('/time/track-task-time' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\TimeController::trackTaskTimeAction',  '_route' => 'track_task_time',);
            }

            // app_time_list
            if (0 === strpos($pathinfo, '/time/list') && preg_match('#^/time/list/(?P<type>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'app_time_list']), array (  '_controller' => 'AppBundle\\Controller\\TimeController::listAction',));
            }

            // app_time_new
            if ('/time/new' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\TimeController::newAction',  '_route' => 'app_time_new',);
            }

            // app_time_edit
            if (0 === strpos($pathinfo, '/time/edit') && preg_match('#^/time/edit/(?P<timeSpent>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'app_time_edit']), array (  '_controller' => 'AppBundle\\Controller\\TimeController::editAction',));
            }

            // app_time_delete
            if (0 === strpos($pathinfo, '/time/delete') && preg_match('#^/time/delete/(?P<timeSpent>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'app_time_delete']), array (  '_controller' => 'AppBundle\\Controller\\TimeController::deleteAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/login')) {
            // fos_user_security_login
            if ('/login' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.security.controller:loginAction',  '_route' => 'fos_user_security_login',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_security_login;
                }

                return $ret;
            }
            not_fos_user_security_login:

            // fos_user_security_check
            if ('/login_check' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.security.controller:checkAction',  '_route' => 'fos_user_security_check',);
                if (!in_array($requestMethod, ['POST'])) {
                    $allow = array_merge($allow, ['POST']);
                    goto not_fos_user_security_check;
                }

                return $ret;
            }
            not_fos_user_security_check:

        }

        // fos_user_security_logout
        if ('/logout' === $pathinfo) {
            $ret = array (  '_controller' => 'fos_user.security.controller:logoutAction',  '_route' => 'fos_user_security_logout',);
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_security_logout;
            }

            return $ret;
        }
        not_fos_user_security_logout:

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_redirect
            if ('/admin' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_sonata_admin_redirect;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'sonata_admin_redirect'));
                }

                return $ret;
            }
            not_sonata_admin_redirect:

            // sonata_admin_dashboard
            if ('/admin/dashboard' === $pathinfo) {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Action\\DashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                if (0 === strpos($pathinfo, '/admin/core/get-')) {
                    // sonata_admin_retrieve_form_element
                    if ('/admin/core/get-form-field-element' === $pathinfo) {
                        return array (  '_controller' => 'sonata.admin.action.retrieve_form_field_element',  '_route' => 'sonata_admin_retrieve_form_element',);
                    }

                    // sonata_admin_short_object_information
                    if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'sonata_admin_short_object_information']), array (  '_controller' => 'sonata.admin.action.get_short_object_description',  '_format' => 'html',));
                    }

                    // sonata_admin_retrieve_autocomplete_items
                    if ('/admin/core/get-autocomplete-items' === $pathinfo) {
                        return array (  '_controller' => 'sonata.admin.action.retrieve_autocomplete_items',  '_route' => 'sonata_admin_retrieve_autocomplete_items',);
                    }

                }

                // sonata_admin_append_form_element
                if ('/admin/core/append-form-field-element' === $pathinfo) {
                    return array (  '_controller' => 'sonata.admin.action.append_form_field_element',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_set_object_field_value
                if ('/admin/core/set-object-field-value' === $pathinfo) {
                    return array (  '_controller' => 'sonata.admin.action.set_object_field_value',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            // sonata_admin_search
            if ('/admin/search' === $pathinfo) {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Action\\SearchAction',  '_route' => 'sonata_admin_search',);
            }

            if (0 === strpos($pathinfo, '/admin/app')) {
                if (0 === strpos($pathinfo, '/admin/app/client')) {
                    // admin_app_client_list
                    if ('/admin/app/client/list' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_list',  '_route' => 'admin_app_client_list',);
                    }

                    // admin_app_client_create
                    if ('/admin/app/client/create' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_create',  '_route' => 'admin_app_client_create',);
                    }

                    // admin_app_client_batch
                    if ('/admin/app/client/batch' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_batch',  '_route' => 'admin_app_client_batch',);
                    }

                    // admin_app_client_edit
                    if (preg_match('#^/admin/app/client/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_client_edit']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_edit',));
                    }

                    // admin_app_client_delete
                    if (preg_match('#^/admin/app/client/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_client_delete']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_delete',));
                    }

                    // admin_app_client_show
                    if (preg_match('#^/admin/app/client/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_client_show']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_show',));
                    }

                    // admin_app_client_export
                    if ('/admin/app/client/export' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'app.admin.client',  '_sonata_name' => 'admin_app_client_export',  '_route' => 'admin_app_client_export',);
                    }

                }

                elseif (0 === strpos($pathinfo, '/admin/app/priority')) {
                    // admin_app_priority_list
                    if ('/admin/app/priority/list' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_list',  '_route' => 'admin_app_priority_list',);
                    }

                    // admin_app_priority_create
                    if ('/admin/app/priority/create' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_create',  '_route' => 'admin_app_priority_create',);
                    }

                    // admin_app_priority_batch
                    if ('/admin/app/priority/batch' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_batch',  '_route' => 'admin_app_priority_batch',);
                    }

                    // admin_app_priority_edit
                    if (preg_match('#^/admin/app/priority/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_priority_edit']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_edit',));
                    }

                    // admin_app_priority_delete
                    if (preg_match('#^/admin/app/priority/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_priority_delete']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_delete',));
                    }

                    // admin_app_priority_show
                    if (preg_match('#^/admin/app/priority/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_priority_show']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_show',));
                    }

                    // admin_app_priority_export
                    if ('/admin/app/priority/export' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'app.admin.priority',  '_sonata_name' => 'admin_app_priority_export',  '_route' => 'admin_app_priority_export',);
                    }

                }

                elseif (0 === strpos($pathinfo, '/admin/app/project')) {
                    // admin_app_project_list
                    if ('/admin/app/project/list' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_list',  '_route' => 'admin_app_project_list',);
                    }

                    // admin_app_project_create
                    if ('/admin/app/project/create' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_create',  '_route' => 'admin_app_project_create',);
                    }

                    // admin_app_project_batch
                    if ('/admin/app/project/batch' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_batch',  '_route' => 'admin_app_project_batch',);
                    }

                    // admin_app_project_edit
                    if (preg_match('#^/admin/app/project/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_project_edit']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_edit',));
                    }

                    // admin_app_project_delete
                    if (preg_match('#^/admin/app/project/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_project_delete']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_delete',));
                    }

                    // admin_app_project_show
                    if (preg_match('#^/admin/app/project/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_project_show']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_show',));
                    }

                    // admin_app_project_export
                    if ('/admin/app/project/export' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'app.admin.project',  '_sonata_name' => 'admin_app_project_export',  '_route' => 'admin_app_project_export',);
                    }

                }

                elseif (0 === strpos($pathinfo, '/admin/app/task')) {
                    // admin_app_task_list
                    if ('/admin/app/task/list' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_list',  '_route' => 'admin_app_task_list',);
                    }

                    // admin_app_task_create
                    if ('/admin/app/task/create' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_create',  '_route' => 'admin_app_task_create',);
                    }

                    // admin_app_task_batch
                    if ('/admin/app/task/batch' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_batch',  '_route' => 'admin_app_task_batch',);
                    }

                    // admin_app_task_edit
                    if (preg_match('#^/admin/app/task/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_task_edit']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_edit',));
                    }

                    // admin_app_task_delete
                    if (preg_match('#^/admin/app/task/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_task_delete']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_delete',));
                    }

                    // admin_app_task_show
                    if (preg_match('#^/admin/app/task/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_task_show']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_show',));
                    }

                    // admin_app_task_export
                    if ('/admin/app/task/export' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'app.admin.task',  '_sonata_name' => 'admin_app_task_export',  '_route' => 'admin_app_task_export',);
                    }

                }

                elseif (0 === strpos($pathinfo, '/admin/app/user')) {
                    // admin_app_user_list
                    if ('/admin/app/user/list' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_list',  '_route' => 'admin_app_user_list',);
                    }

                    // admin_app_user_create
                    if ('/admin/app/user/create' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_create',  '_route' => 'admin_app_user_create',);
                    }

                    // admin_app_user_batch
                    if ('/admin/app/user/batch' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_batch',  '_route' => 'admin_app_user_batch',);
                    }

                    // admin_app_user_edit
                    if (preg_match('#^/admin/app/user/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_user_edit']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_edit',));
                    }

                    // admin_app_user_delete
                    if (preg_match('#^/admin/app/user/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_user_delete']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_delete',));
                    }

                    // admin_app_user_show
                    if (preg_match('#^/admin/app/user/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_app_user_show']), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_show',));
                    }

                    // admin_app_user_export
                    if ('/admin/app/user/export' === $pathinfo) {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'app.admin.user',  '_sonata_name' => 'admin_app_user_export',  '_route' => 'admin_app_user_export',);
                    }

                }

            }

        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
