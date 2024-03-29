<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PropelQueryBuilder;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\PropelQueryBuilder\Dependency\Service\PropelQueryBuilderToUtilEncodingBridge;

/**
 * @method \Spryker\Zed\PropelQueryBuilder\PropelQueryBuilderConfig getConfig()
 */
class PropelQueryBuilderDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const SERVICE_UTIL_ENCODING = 'SERVICE_UTIL_ENCODING';

    /**
     * @var string
     */
    public const PLUGINS_QUERY_STRING_DECISION_RULE = 'PLUGINS_QUERY_STRING_DECISION_RULE';

    /**
     * @var string
     */
    public const PLUGINS_QUERY_STRING_COLLECTOR = 'PLUGINS_QUERY_STRING_COLLECTOR';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container = $this->addUtilEncodingService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUtilEncodingService(Container $container)
    {
        $container->set(static::SERVICE_UTIL_ENCODING, function (Container $container) {
            return new PropelQueryBuilderToUtilEncodingBridge($container->getLocator()->utilEncoding()->service());
        });

        return $container;
    }
}
