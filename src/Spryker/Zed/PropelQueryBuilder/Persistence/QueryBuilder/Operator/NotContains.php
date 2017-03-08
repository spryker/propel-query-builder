<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PropelQueryBuilder\Persistence\QueryBuilder\Operator;

use Generated\Shared\Transfer\PropelQueryBuilderRuleSetTransfer;
use Propel\Runtime\ActiveQuery\Criteria;

class NotContains extends AbstractOperator
{

    const TYPE = 'not_contains';

    /**
     * @return string
     */
    public function getOperator()
    {
        return Criteria::NOT_LIKE;
    }

    /**
     * @param \Generated\Shared\Transfer\PropelQueryBuilderRuleSetTransfer $rule
     *
     * @return mixed
     */
    public function getValue(PropelQueryBuilderRuleSetTransfer $rule)
    {
        return sprintf('%%%s%%', $rule->getValue());
    }

}
